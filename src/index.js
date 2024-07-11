import React from "react";
import ReactDOM from "react-dom";
import App from "./App";

/**
 * Import the stylesheet for the plugin.
 */
import './style/main.scss';

// Render the App component into the DOM
// render(<App />, document.getElementById('post-data'));
// const postDataElement = document.getElementById('post-data');

// const root = createRoot(postDataElement);
// root.render(<App />);

var data = <Post />;
document.addEventListener("DOMContentLoaded", function () {
    var element = document.getElementById("post-data");
    if (typeof element !== "undefined" && element !== null) {
        ReactDOM.render(
            data,
            document.getElementById("post-data")
        );
    }
});