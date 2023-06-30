<?php

namespace App\Http\Controllers\Front\Modules;

use App\Http\Controllers\Controller;
use App\Mail\Front\FormFeedBack;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;
use App\Mail\MailErrorSend;

class ShotController extends Controller
{

    private $errorTxt = 'Ошибка 503 - сервис скрин-шотов не запустился, администратор уже уведомлен об этом на e-mail';


    public function index($slug) {
//worck with console =>    npm install puppeteer@^14.2.1

        $url = config('byweb.domen').'/kontakty';
        $savePath = config('byweb.images.cards').$slug.'.jpg';
        $savePathPdf = config('byweb.images.cards').$slug.'-pdf.pdf';
        $selector = '#'.$slug;

        try {
//        мануал  по jpg  https://spatie.be/docs/browsershot/v2/usage/creating-images
            $img = Browsershot::url($url)
                ->select($selector)
//                ->deviceScaleFactor(1)
                ->setDelay(1000)
                ->windowSize(2000, 800)
//                ->fullPage()
//                ->setScreenshotType('jpeg', 100)
//                ->save($savePath);
                ->base64Screenshot();

//        мануал по pdf https://spatie.be/docs/browsershot/v2/usage/creating-pdfs
//            Browsershot::url($url)
////                ->format('A3')
////                ->setDelay(1000)
//
//                ->paperSize(600, 800)
//                ->savePdf($savePathPdf);


        } catch (\Exception $e) {

            Mail::to(config('byweb.mail'))->send(new MailErrorSend($this->errorTxt.' '.$e));

            abort(503, $this->errorTxt);

        }






        return view('byweb.modules.shot.index', compact('slug', 'img'));
    }
}
