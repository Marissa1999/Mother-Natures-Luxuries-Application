<?php

/**
 * @accessFilter:{LoginFilter}
 */

class MessageController extends Controller
{

    public function index()
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['profile_id'] = $theProfile->profile_id;
        $profiles = $this->model('Profile')->get();
        $this->view('message/index', ['profiles'=>$profiles]);
    }

    public function viewMessages($profile_id)
    {
        $user_id = (string) $_SESSION['user_id'];
        $theProfile = $this->model('Profile')->findProfile($user_id);
        $_SESSION['message_sender'] = $theProfile->profile_id;
        $_SESSION['message_receiver'] = $profile_id;
        $profiles = $this->model('Message')->getSendersAndMessages();
        $messages = $this->model('Message')->getMessages($_SESSION['message_receiver']);
        $this->view('message/viewMessages', ['messages'=>$messages, 'profiles'=>$profiles]);
    }

    public function create()
    {
        if(isset($_POST['action']))
        {
            $newMessage = $this->model('Message');
            $newMessage->message_sender = $_SESSION['message_sender'];
            $newMessage->message_receiver = $_SESSION['message_receiver'];
            $newMessage->message_text = $_POST['message_text'];
            $newMessage->message_timestamp = $_POST['message_timestamp'];
            $newMessage->message_read = false;
            $newMessage->create();
            header('location:/message/viewMessages/'.$_SESSION['message_receiver']);
        }

        else
        {
            $this->view('message/create', $_SESSION['message_receiver']);
        }
    }

    public function detail($message_id)
    {
        $theMessage = $this->model('Message')->find($message_id);
        $theMessage->message_read = true;
        $theMessage->updateRead();
        header('location:/message/viewMessages/'. $_SESSION['message_receiver']);
        $this->view('message/detail', $theMessage);
    }

    public function edit($message_id)
    {
        $theMessage = $this->model('Message')->find($message_id);

        if(isset($_POST['action']))
        {
            $theMessage->message_text = $_POST['message_text'];
            $theMessage->message_timestamp = $_POST['message_timestamp'];
            $theMessage->message_read = false;
            $theMessage->update();
            header('location:/message/viewMessages/'.$_SESSION['message_receiver']);
        }

        else
        {
            $this->view('message/edit', $theMessage);
        }
    }

    public function delete($message_id)
    {
        $theMessage = $this->model('Message')->find($message_id);

        if(isset($_POST['action']))
        {
            $theMessage->delete();
            header('location:/message/viewMessages/'.$_SESSION['message_receiver']);
        }

        else
        {
            $this->view('message/delete', $theMessage);
        }
    }
}

?>