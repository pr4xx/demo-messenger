# Demo Messenger

## Setup

- `git clone git@github.com:pr4xx/demo-messenger.git`
- `composer install`
- `npm install`
- `npm run build`
- `php artisan migrate:fresh --seed`
- `php artisan serve` (or any other web server)

## Tasks

Submit your solution as a branch and pull request on GitHub.

### Problem #1

Open a browser and navigate to `/` of this project.
A vue component is responsible for displaying data fetched from an internal API.
For some reason, this is broken. Only the heading is visible.
What is the problem? Make the page render the data.


### Problem #2

On the same page as from the problem above, there is a `Delete` button for each conversation.
Pressing any button seems not to work.
What is the problem? Make the button actually delete a conversation.

### Feature #1

When the page loads, display a simple "Loading" message while fetching the API data.

### Feature #2

The list of conversations and messages show a date (after "sent at") in a raw format. Use a JS datetime library
of your choice and display the "sent at" datetime in human-readable way.
