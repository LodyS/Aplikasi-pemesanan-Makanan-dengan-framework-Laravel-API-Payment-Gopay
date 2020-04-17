<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ta_detailorder;
class warungKuEmail extends Mailable
{
    use Queueable, SerializesModels;
 
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from('alfaomega1092@gmail.com')
                   ->view('transaksiMakananSelesai')
                   ->with(
                    [
                        'nama' => 'Warungku',
                        'website' => 'warungku.co.id',
                    ]);
    }
}