# Multi-Verifier

A toy project for practicing abstract classes and interfaces in PHP — and to show why they are useful in the first place.

The idea is simple: there is a `Reviewer` interface with a single `review(string $file)` method, and several interchangeable implementations:

- `FakeReviewer` — always praises your code 🙂
- `AnthropicReviewer` — sends the file to Claude for review
- `OpenAIReviewer` — sends the file to GPT for review

The client code doesn't care who exactly does the review — it works with the interface, and the concrete implementation is picked via a command-line argument.

## Requirements

To try it locally you will need:

- PHP 8+ and Composer
- [Claude Code](https://claude.com/claude-code) installed — `AnthropicReviewer` calls the `claude` CLI under the hood
- An OpenAI account with billing set up to create a secret API key (put it into `.env` as `OPENAI_API_KEY`)

## Running

```bash
composer install
php verify.php example.php fake
php verify.php example.php anthropic
php verify.php example.php openai
```

No practical use whatsoever. Just for fun.
