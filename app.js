const http = require('http')
const fs = require('fs')
const path = require('path')

var server = http.createServer(function (req, res) {
    let filepath = path.join(__dirname, 'project', req.url === '/' ? 'index.html' : req.url)
    const ext = path.extname(filepath)
    let type = 'text/html'
    switch (ext) {
        case '.css':
            type = 'text/css'
            break
        case '.js':
            type = 'text/javascript'
            break
        default:
            type = 'text/html'
    }
    if (!ext) {
        filepath += '.html'
    }
    fs.readFile(filepath, (err, content) => {
        if (err) {
            fs.readFile(path.join(__dirname, 'project', 'error.html'), (err, data) => {
                if (err) {
                    res.writeHead(500)
                    res.end('Ошибка 500')
                } else {
                    res.writeHead(200, {
                        'Content-Type': 'text/html'
                    })
                } res.end(data)
            })
        } else {
            res.writeHead(200, {
                'Content-Type': type
            })
            console.log(type);
            res.end(content)
        }
    })
})
server.listen(3000, 'localhost')
console.log('Сервер запущен')
