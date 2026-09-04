# Multi-Verifier

Игрушечный проект для практики абстрактных классов и интерфейсов в PHP — и чтобы наглядно показать, зачем они вообще нужны.

Идея простая: есть интерфейс `Reviewer` с одним методом `review(string $file)`, и несколько взаимозаменяемых реализаций:

- `FakeReviewer` — всегда хвалит ваш код 🙂
- `AnthropicReviewer` — отправляет файл на ревью Claude
- `OpenAIReviewer` — отправляет файл на ревью GPT

Клиентскому коду всё равно, кто именно делает ревью — он работает с интерфейсом, а конкретная реализация выбирается аргументом командной строки.

## Запуск

```bash
composer install
php verify.php example.php fake
php verify.php example.php anthropic
php verify.php example.php openai
```

Практического применения не имеет. Just for fun.
