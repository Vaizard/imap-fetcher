# imap-fetcher
A skeleton script to pull e-mail addresses from a gmail inbox (or generally any imap inbox).
If used with gmail, don't forget to 

- enable 'less secure apps' https://myaccount.google.com/lesssecureapps (whatever gmail considers secure)
- enable imap in https://mail.google.com/mail/u/0/#settings/fwdandpop

Installation and setup:

```
git clone https://github.com/Vaizard/imap-fetcher/
cd imap-fetcher
cp config.dist.php config.inc.php
nano config.inc.php # set the username and password of your target mailbox
chmod +x imap-fetcher.php
```

Usage

```
php ./imap-fetcher.php # stdout output
php ./imap-fetcher.php | uniq > list.csv # file output of unique addresses
```

