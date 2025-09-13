from http.server import BaseHTTPRequestHandler, HTTPServer
import socket

LISTENER_IP = "10.10.14.17"  # change to your nc machine IP
LISTENER_PORT = 4444

class CallbackHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        # connect back to your listener safely
        try:
            with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
                s.connect((LISTENER_IP, LISTENER_PORT))
                s.sendall(b"Callback triggered from HTTP request\n")
        except Exception as e:
            print("Callback failed:", e)

        # Respond to the web request
        self.send_response(200)
        self.end_headers()
        self.wfile.write(b"Callback sent!\n")

if __name__ == "__main__":
    server = HTTPServer(("0.0.0.0", 8081), CallbackHandler)
    print("Listening on http://0.0.0.0:8081")
    server.serve_forever()
