const {index, store, update, destroy} = require ("./FruitController");

const main = () => {
    console.log("Showing Fruits...");
    index();

    console.log("\nAdding Banana to Fruits...");
    store("Banana");

    console.log("\nReplace index 0 to Coconut...");
    update(0, "Coconut");


    console.log("\nDelete index 0...");
    destroy(0);

}

main();