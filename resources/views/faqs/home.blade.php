<!DOCTYPE html>
<html>
    <head>
        <title>EHU CS FAQ's</title>
        <link rel="stylesheet" href="/css/faqs.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <header>
            <h1>EHU CS FAQ's</h1>
        </header>

        <ul class="topics">
            @if (isset ($topics))
                <!-- Displays a list of topics for the user to choose from -->
                @foreach($topics as $topic)
                    <li><a href="/faqs/{{ $topic->id }}/">{{ $topic->name }} <span class="fa fa-chevron-right"></span></a></li>
                @endforeach
            @else
                <li><a href="#"> No topics have been added yet</a></li>
            @endif
        </ul>
    </body>
</html>
