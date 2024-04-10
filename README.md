# Alphabet Game

Another stupid game where you guess the letters. It's like password cracking except slower and more boring.

## Interesting things as I go along

- Wow, if I set things up on my own I realise how much I've forgotten by using project templates and scaffolds.
- It doesn't work if I escape `wp_interactivity_data_wp_context()` and phpcs gets annoyed when I don't.
- Passing the `--experimental-modules` flag to `wp-scripts start` borks custom webpack implementations. I'm not debugging this now and will fix the hacky dev setup later.
- Building the `view.js` sometimes silently fails. Not sure why but if it's not there, try seeing if there are any issues and re-saving.
