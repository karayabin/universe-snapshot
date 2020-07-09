Light_Mailer events
=============
2020-06-29



The **Light_Mailer** plugin provides the following events:


- Light_Mailer.on_mail_sent: this event is triggered from LightMailerService->sendMessage,
        when an email was successfully sent. 
        You can use this to collect statistics about who opened their mail for instance.
        The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) with the following variables:
         - recipientList: the recipient list used for the sending.
                If the mail was sent in batch mode, it's just a string representing the email address of the recipient.
                If the mail wasn't sent in batch mode, it's the recipientList variable that the caller of the **send** method passed.
         - templateId: the template id