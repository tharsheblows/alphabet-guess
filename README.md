# Alphabet Game

Another stupid game where you guess the letters. It's like password cracking except slower and more boring.

## Interesting things as I go along

- Wow, if I set things up on my own I realise how much I've forgotten by using project templates and scaffolds.
- It doesn't work if I escape `wp_interactivity_data_wp_context()` and phpcs gets annoyed when I don't.
- Passing the `--experimental-modules` flag to `wp-scripts start` borks custom webpack implementations. I'm not debugging this now and will fix the hacky dev setup later.
- Building the `view.js` sometimes silently fails. Not sure why but if it's not there, try seeing if there are any issues and re-saving. I need to make an edit to the view.js file and re-save for it to work reliably. Keep checking if the block doesn't work.
- You can't use WP scripts in a module, error when trying to use `@wordpress/hooks` in view.js for the interactive block is: "Module not found: Error: Attempted to use WordPress script in a module: @wordpress/hooks, which is not supported yet."
- For xDebug in vscode when using `wp-scripts` out of the box, map the `build` directory to `src` as the php files are copied over too
