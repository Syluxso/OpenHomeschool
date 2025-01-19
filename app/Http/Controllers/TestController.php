<?php

namespace App\Http\Controllers;

use App\Http\Helpers\HubspotContacts;
use App\Http\Helpers\StoryView;
use App\Models\Contact;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;
use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Contracts\ConsumerMessage;
use Illuminate\Support\Facades\Log;
use App\Http\Helpers\CsvReader;
use App\Http\Helpers\HubspotSearch;

class TestController extends Controller
{
    public function test($contact_id, Request $request) {
        $this->page->view('test');
        $this->page->page_title('Test Page');
        $this->page->title('Welcome');

        $url = 'https://api.fitbit.com/1/user/-/profile.json';

        $accessToken = 'b082982dbac6a18c18c94184f21db0a1'; // Replace with your access token

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // API endpoint
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $accessToken" // Add access token in header
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            dump($ch); exit;
            echo 'Error: ' . curl_error($ch);
        } else {
            $data = json_decode($response, true);
            dump($data); exit;
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }

        return $this->page->output();
    }

    public function kafka($contact_id) {
        $this->page->view('test');
        $this->page->add_variable('test', 'Default used at ' . date('M d, Y g:ia'));
        $this->page->page_title('Test Page');
        $this->page->title('Welcome');

        // $contact = Contact::find($contact_id);
        // BatchHubspotQueue::dispatch($contact);

        $producer = Kafka::publish('45.79.42.188:9092')->onTopic('generic')->withBodyKey('contact', ['ping' => 'volo'])->send();
//        $consumer = Kafka::consumer(['generic'])
//            ->withBrokers('localhost:9092')
//            ->withAutoCommit()
//            ->stopAfterLastMessage()
//            ->withHandler(function(ConsumerMessage $message, MessageConsumer $consumer) {
//                $this->page->add_variable('test', $message);
//                Log::debug('Variable Content:', $message);
//                Log::debug('Variable Content:', $consumer);
//            })
//            ->build();
//
//        $consumer->consume();
        return $this->page->output();
    }
}



