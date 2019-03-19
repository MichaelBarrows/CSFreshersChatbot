<!DOCTYPE html>
<html>
    <head>
        <title>EHU CS Chatbot</title>
        <link rel="stylesheet" href="/css/chatbot.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="/js/chatbot.js"></script>
    </head>
    <body>
        <!-- Chatbot interface -->
        <header>
            <h1>EHU CS Chatbot <a href="#" id="help" onClick="apiRequest('help')">?</a></h1>
            <div class="clear"></div>
        </header>
        <!-- Message log -->
        <div id="messages">
            <p class="message chatbot_message">Hello, this is a chatbot for students of Edge Hill University's Department of Computer Science.</p>
        </div>
        <!-- User input -->
        <form id="user_message_form" onSubmit="return apiRequest('user_input');">
            <input type="text" name="user_text" id="user_text" autocomplete="off">
            <button type="submit" id="submit">
                <span class="fa fa-chevron-right"></span>
            </button>
        </form>
    </body>
</html>
