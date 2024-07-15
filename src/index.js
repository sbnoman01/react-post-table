import React from "react";
import ReactDOM from "react-dom";
import App from "./App";
// import Post from "./Post";

/**
 * Import the stylesheet for the plugin.
 */
import './style/main.scss';

document.addEventListener("DOMContentLoaded", function () {
    var element = document.getElementById("post-data");
    if (typeof element !== "undefined" && element !== null) {
        ReactDOM.render(
            <App />,
            document.getElementById("post-data")
        );
    }
});