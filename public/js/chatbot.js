/**
 * Chatbot application JavaScript
 *
 * The code in this file is used to:
 * * Send requests to the chatbot
 * * Process responses from the chatbot
 * * Add responses to the user interface
 * * Add user meassages to the user interface
 * * Process cookies for the userId (required to ensure user is not continuing
 *      someone elses conversation)
 * * To process clicks on button elements
 *
 * @author Michael Barrows <contact@michaelbarrows.co.uk>
 */

// Used to assign an id to chatbot response elements
var chatbot_response_count = 0;

/**
 * setUserIdCookie()
 *
 * This function sets the value of the userId cookie so that it can be sent
 * with requests to the chatbot.
 *
 * REFSNES DATA, 2019.W3Schools.com. JavaScript Cookies.
 * Available also from:https://www.w3schools.com/js/js_cookies.asp
 *
 * @param int value userId returned from the chatbot
 */

function setUserIdCookie(value) {
    var expiry_date = new Date();
    expiry_date.setTime(expiry_date.getTime() + (14 * 24 * 60 * 60 * 1000));
    var expires = "expires="+expiry_date.toUTCString();
    document.cookie = "userId=" + value + ";" + expires + ";path=/";
}

/**
 * getCookie()
 *
 * This function retrieves the userId cookie so that it can be sent
 * with requests to the chatbot.
 *
 * REFSNES DATA, 2019.W3Schools.com. JavaScript Cookies.
 * Available also from:https://www.w3schools.com/js/js_cookies.asp
 *
 * @param string cookie Name of the cookie to be returned
 */

function getCookie(cookie) {
    var name = cookie + "=";
    var cookie_array = document.cookie.split(';');
    for(var idx = 0; idx < cookie_array.length; idx++) {
        var element = cookie_array[idx];
        while (element.charAt(0) == ' ') {
            element = element.substring(1);
        }
        if (element.indexOf(name) == 0) {
            return element.substring(name.length, element.length);
        }
    }
}

/**
 * checkCookie()
 *
 * This function checks to identify if the userId cookie is set
 *
 * REFSNES DATA, 2019.W3Schools.com. JavaScript Cookies.
 * Available also from:https://www.w3schools.com/js/js_cookies.asp
 */

function checkCookie() {
    var cookie = getCookie("userId");
    if (cookie != "") {
        return cookie;
    } else {
        return undefined;
    }
}

/**
 * apiRequest()
 *
 * This function sets the value of the userId cookie so that it can be sent
 * with requests to the chatbot.
 *
 * REFSNES DATA, 2019.W3Schools.com. JavaScript Cookies.
 * Available also from:https://www.w3schools.com/js/js_cookies.asp
 *
 * @param string value A value to be sent to the chatbot, or "user_input" to
 * indicate user input should be sent to the chatbot
 */

function apiRequest(value) {
    chatbot_response_count += 1;
    var chatbot_response_id = "cb_response_" + chatbot_response_count;
    if (value == "user_input") {
        var element = document.getElementById("user_text");
        var message = element.value;
        if (message == "") {
            return false;
        }
        addUserMessage(element.value);
    } else if (value == "help") {
        addUserMessage("Help");
        var message = "help";
    } else {
        var message = value;
    }
    var cookie_value = checkCookie();
    var xhr = new XMLHttpRequest();
    var url = "/botman";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var json = JSON.parse(xhr.responseText);
            for (var idx = 0; idx < json.messages.length; idx++){
                if (cookie_value == undefined && typeof json.messages[idx].additionalParameters.userId !== 'undefined') {
                    setUserIdCookie(json.messages[idx].additionalParameters.userId);
                }
                var newcbMessage = document.createElement("P");
                newcbMessage.setAttribute('class', 'message chatbot_message');
                if (idx == json.messages.length - 1) {
                    newcbMessage.setAttribute('id', chatbot_response_id);
                }
                var cbmessageTextNode = document.createTextNode(json.messages[idx].text);
                newcbMessage.appendChild(cbmessageTextNode);
                document.getElementById("messages").appendChild(newcbMessage);
                if (typeof json.messages[idx].actions !== 'undefined' || typeof json.messages[idx].additionalParameters.actions !== 'undefined') {
                    newcbMessage.setAttribute('id', chatbot_response_id);
                    if (typeof json.messages[idx].actions !== 'undefined') {
                        var actions = json.messages[idx].actions;
                    } else if (typeof json.messages[idx].additionalParameters.actions !== 'undefined') {
                        var actions = json.messages[idx].additionalParameters.actions;
                    }
                    for (var jdx = 0; jdx < actions.length; jdx++){
                        var newMessage = document.createElement("A");
                        newMessage.setAttribute('class', 'option');
                        newMessage.setAttribute('href', actions[jdx].value);
                        var number_exp = new RegExp('^[0-9]+$');
                        if (!number_exp.test(actions[jdx].value)) {
                            newMessage.setAttribute('target', '_blank');
                            newMessage.setAttribute('class', 'option link');
                        } else {
                            newMessage.setAttribute('class', 'option');
                        }
                        newMessage.addEventListener("click", function(event){
                            if (number_exp.test(this.getAttribute('href'))) {
                                event.preventDefault();
                                optionClick(this.getAttribute('href'), this.innerHTML);
                            }
                            document.querySelectorAll('.option').forEach(function(a){
                                if (!a.classList.contains('link')) {
                                    a.parentNode.removeChild(a);
                                }
                            });
                        });
                        var messageTextNode = document.createTextNode(actions[jdx].text);
                        newMessage.appendChild(messageTextNode);
                        document.getElementById(chatbot_response_id).appendChild(newMessage);
                    }
                }
            }
            if (value == "user_input") {
                element.value = "";
            }
        }
        window.scrollTo(0,document.body.scrollHeight);
    };
    var data = JSON.stringify({"driver": "web", "userId": cookie_value, "message": message});
    xhr.send(data);
    return false;
}

/**
 * addUserMessage()
 *
 * This function adds a user's message to the chatlog.
 *
 * @param string message The message to be added to the chatlog
 */

function addUserMessage(message) {
  var newUserMessage = document.createElement("P");
  newUserMessage.setAttribute('class', 'message user_message');
  var messageTextNodeUser = document.createTextNode(message);
  newUserMessage.appendChild(messageTextNodeUser);
  document.getElementById("messages").appendChild(newUserMessage);
}

/**
 * optionClick()
 *
 * This function is called when an option is selected by the user. The value of
 * the option is sent to the apiRequest function to reply to the follow up
 * question and the text of the option is sent to the addUserMessage function
 * so that it can be added to the chatlog.
 *
 * @param integer value The numeric ID of the selected option
 * @param string  text  The text of the option to be added to the chatlog
 */

function optionClick(value, text) {
    addUserMessage(text);
    apiRequest(value);
}

// Starts the conversation between the chatbot and the user.
apiRequest("hello");
