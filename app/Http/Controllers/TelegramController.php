<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{

    /**
     * Handle the form submission and send data to Telegram.
     */
    public function submitPayment(Request $request)
    {
        // Get all form data
        $formData = $request->all();
    
        // Mapping bank values to account numbers
        $accountNumber = $this->getAccountNumber($formData['bankSelect']);
    
        // Message to be sent to Telegram
        $message = "New payment details:\n\n";
        $message .= "Bank: {$formData['bankSelect']}\n";
        $message .= "Nama Rekening Pengirim: {$formData['Rekening']}\n";
        $message .= "Nominal: {$formData['Nominal']}\n";
        $message .= "Account Number: $accountNumber\n";
    
        // Telegram Bot API Token
        $token = '6241409885:AAEtqATF3O341ox21xyXPW4CltkZDrcVBm4';
    
        // Chat ID (you can get this from the Telegram API or use your own chat ID)
        $chatId = '1783951999';
    
        // Send the message to Telegram
        $response = Http::post("https://api.telegram.org/bot$token/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    
        // Check if the message was sent successfully
        if ($response->successful()) {
            return redirect()->route('dashboard.payment.index')->with('status', 'success');
        } else {
            return redirect()->route('dashboard.payment.index')->with('status', 'error');
        }
    }
    
}
