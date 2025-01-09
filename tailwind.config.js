/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                myBlueOcean: "#3590E4",
                mySkyBlue: "#51DBFF",
                myBlue: "#0C5AA3",
                myNavy: "#00407C",
                myOrange: "#F6741E",
                myYellowSand: "#FFBB46",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
