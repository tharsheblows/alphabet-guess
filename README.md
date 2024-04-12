# Alphabet Game

Another stupid game where you guess a letter.

## To run this

1. run `nvm use` (or make sure you're using node v18.15.0)
2. run `npm install`
3. run `npm run build` – going straight to `npm run dev` doesn't build the `view.js` files correctly
4. run `npm run dev`

The site will be on [http://localhost:8888/](http://localhost:8888/)

You can log in with the username "admin" and the password "password", it uses `wp-env`.

## Interesting things as I go along

- Wow, if I set things up on my own I realise how much I've forgotten by using project templates and scaffolds.
- It doesn't work if I escape `wp_interactivity_data_wp_context()` and phpcs gets annoyed when I don't.
- Passing the `--experimental-modules` flag to `wp-scripts start` borks custom webpack implementations. I'm not debugging this now and will fix the hacky dev setup later.
- Building the `view.js` sometimes silently fails. Not sure why but if it's not there, try seeing if there are any issues and re-saving. I need to make an edit to the view.js file and re-save for it to work reliably. Keep checking if the block doesn't work.
- You can't use WP scripts in a module, error when trying to use `@wordpress/hooks` in view.js for the interactive block is: "Module not found: Error: Attempted to use WordPress script in a module: @wordpress/hooks, which is not supported yet."
- For xDebug in vscode when using `wp-scripts` out of the box, map the `build` directory to `src` as the php files are copied over too
- I have not tweaked the parent rules for the two internal game blocks, I can't be bothered at this point so it's possible to add them to a column block when they're not associated with a game. Just don't do that, it won't work.

## The matter of state

It's bothering me that it's all over the place! Also how do I put more than one of the same block on the page? Both of these can be solved -- and we'll see if this is a decent solution or not, I don't know -- by creating a parent block and having the guts of the game be child blocks. I'll make it so that you can add any other blocks in there but let's give this a go.

So this does work. The guts of adding in the stores for more than one block are in `src/helpers/utils.js`. State necessary for js is in `src/blocks/alphabet-guess/initial-state.js` which keeps that as one source and then the dynamically added state can be done using `BlockAlphabetGuess->initialize_state( $namespace, $state )`
