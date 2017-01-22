<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Snippets</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css">
        <style>
            article.snippet {
                margin-bottom: 2em;
                border-bottom: 1px solid whitesmoke;
            }

            pre {
                background: none;
            }

            pre code {
                background: whitesmoke;
            }

            .flex {
                flex: 1;
            }
        </style>
    </head>
    <body>
        <section class="hero is-bold is-primary">
            <div class="hero-body">
                <div class="container">
                    <a href="/snippets">
                        <h1 class="title">Snippets</h1>
                    </a>

                    <h2 class="subtitle">
                        let's create and fork snippets
                    </h2>

                    <a href="/snippets/create" class="button is-primary">create Snippet</a>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                @yield('contents')
            </div>
        </section>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </body>
</html>
