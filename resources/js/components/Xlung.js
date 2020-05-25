import React from 'react';
import ReactDOM from 'react-dom';

function Xlung() {
    return (
        <span className="container">
            <script src="xlung.js" type="text/javascript"> </script>
        </span>
    );
}

export default Xlung;

if (document.getElementById('Xlung')) {
    ReactDOM.render(<Xlung />, document.getElementById('Xlung'));
}
