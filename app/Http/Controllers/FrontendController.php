<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentor;
use App\Models\Kelas;
use App\Models\KategoriKelas;
use App\Models\Video;
use App\Models\Event;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Mail;

class FrontendController extends Controller
{
    public function index(){

        $tentor = Tentor::all();
        $kelas = Kelas::all();
        $event = Event::all();

        return view('frontend.index', compact(
            'tentor','kelas','event'
        ));
    }

    public function kelas(){
        
        $kelas = Kelas::all();
        
        return view('frontend.kelas', compact(
            'kelas'
        ));
    }

    public function kelasDetail($id){

        $kelas = Kelas::find($id);
        $video = Video::where('kelas_id', $id)->first();

        return view('frontend.kelasdetail', compact(
            'kelas','video'
        ));
    }

    public function kelasFilter($id){
        
        $kategori = KategoriKelas::find($id);
        $kelas = Kelas::where('kategori_id', $id)->get();

        return view('frontend.kelasfilter', compact(
            'kategori','kelas'
        ));
    }

    public function event(){
        
        $event = Event::all();

        return view('frontend.event', compact(
            'event'
        ));
    }
    
    public function eventDetail($id){
        
        $event = Event::find($id);

        return view('frontend.eventdetail', compact(
            'event'
        ));
    }

    // public function contact(Request $request){

    //     $data = [
    //         'subject' => $request->subject,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'content' => $request->content,
    //         'addCC' => $request->cc
    //     ];
  
    //     Mail::send([], [], function ($message) use($data) {
    //     $message->from($data['email'], $data['name'])
    //     ->to('arizal.pratama77@gmail.com')
    //     ->addCC($data['addCC'])
    //         ->subject($data['subject'])
    //         // here comes what you want
    //         ->setBody($data['content']); // assuming text/plain
    //     });

    //     toast('Email successfully sent!', 'success');

    //     return back();
    // }

    public function contact(Request $request){

        $subject = $request->input('subject');
        $name = $request->input('name');
        $emailAddress = $request->input('email');
        $content = $request->input('content');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Pengaturan Server
           // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'arizal.pratama77@gmail.com';                 // SMTP username
            $mail->Password = 'sahabat kita123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            // Siapa yang mengirim email
            $mail->setFrom($request->email, $request->name);

            // Siapa yang akan menerima email
            $mail->addAddress('arizal.pratama77@gmail.com', 'Arizal Pratama');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $name);
            
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->AltBody = $content;

            $mail->send();

            toast('Email successfully sent!', 'success');

        return back();

        } catch (Exception $e) {
            toast($mail->ErrorInfo, 'error');

        return back();
        }
    }
}
