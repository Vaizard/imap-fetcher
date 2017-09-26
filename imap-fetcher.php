<?php
    include('./config.inc.php');
    $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';

    echo "fetching data for ".$username."\n";
    $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
    echo "[ok] connected\n";

    $emails = imap_search($inbox,'ALL');
    if($emails) {
      $output = '';
      rsort($emails);
      $i=0;
      foreach($emails as $email_number) {
        $i=$i+1;
        $overview = imap_fetch_overview($inbox,$email_number,0);
        $header = imap_headerinfo($inbox,$email_number);
        $from=$header->from;
        $replyto = $header->reply_to;

        foreach ($from as $id => $object) {
         //$fromname = $object->personal;
         //reply-to
         $fromaddress = $object->mailbox . "@" . $object->host;
        }

        foreach ($replyto as $id => $object) {
         $replytoaddress = $object->mailbox . "@" . $object->host;
        }

        echo $fromaddress.";".$replytoaddress."\n";

      }
    }
    imap_close($inbox);
?>
