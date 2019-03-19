<!DOCTYPE html>
<html>
    <head>
        <title>EHU CS FAQ's</title>
        <link rel="stylesheet" href="/css/faqs.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="/js/faqs.js"></script>

    </head>
    <body>
        <header>
            <h1>EHU CS FAQ's</h1>
        </header>

        @if (isset($topic))
            <h2><a href="/faqs/">{{ $topic->name }}</a></h2>
            <ul class="questions">
                <!-- List of questions for the user to choose from -->
                @foreach($topic->questions as $question)
                    <li><a href="#" id="question-{{ $question->id }}">{{ $question->text }} <span class="fa fa-plus"></span></a>
                    <!-- List of answers to the question (initially hidden) -->
                    @if (count($question->answers) > 0)
                        <ul class="answers hide">
                            @foreach($question->answers as $answer)
                                <li>{{ $answer->text }}</li>
                            @endforeach
                        </ul></li>
                    @endif
                    <!-- Follow up question (initially hidden) -->
                    @if (isset($question->fu_question))
                        <ul class="follow-up-question hide">
                            <li><a href="#" id="follow-up-question-{{ $question->fu_question->id }}">{{ $question->fu_question->text }}</a>
                            @if (isset($question->fu_question->fu_options))
                                <ul class="follow-up-options">
                                    <!-- List of options (initially hidden) -->
                                    @foreach($question->fu_question->fu_options as $option)
                                        <li><a href="#" id="follow-up-option-{{ $option->id }}">{{ $option->option }} <span class="fa fa-plus"></span></a>
                                        @if (isset($option->fu_responses))
                                            <ul class="follow-up-answers hide">
                                                <!-- Responses to each of the follow up options (initially hidden) -->
                                                @foreach($option->fu_responses as $response)
                                                    <li>{{ $response->response }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </ul></li></li></li></li></li>
                    @endif
                @endforeach
            @else
                <li><a href="#"> No topics have been added yet</a></li>
            @endif
        </ul>
    </body>
</html>
