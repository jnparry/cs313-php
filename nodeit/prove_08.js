var http = require("http");
var url = require('url');

function onRequest(req, res) {
	console.log("A request was received...");

	var q = url.parse(req.url, true);
	var data = q.query;
	console.log("Path: ", q.pathname);
	console.log("Name: ", data.name);

	if (q.pathname === "/home") {
		var name = "";

		if (data.name) {
			var name = ", " + data.name;
		}

		res.writeHead(200, {"Content-Type": "text/html"});
		res.write("<html><body><h1>Welcome to the Home Page" + name + "!</h1></body></html>");
	}
	else if (q.pathname === "/getData") {
		res.writeHead(200, {"Content-Type": "application/json"});
		res.write("{\"name\":\"Br. Burton\",\"class\":\"cs313\"}");
	}
	else {
		res.writeHead(404, {"Content-Type": "text/html"});
		res.write("Page Not Found.");
	}

	res.end();
}

var server = http.createServer(onRequest);
server.listen(8888);

console.log("The server is now listening on port 8888...");