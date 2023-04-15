var interval = 0;
var messageDone = true;
class textLine {
    static textHieght = 25;
    constructor(text, x, y) {
        this.text = text;
        this.x = Number(x);
        this.y = Number(y);
    }
    get y() {
        return this.__y;
    }
    set y(i) {
        this.__y = i;
    }
    set x(x) {
        this.__x = x;
    }
    get x() {
        return this.__x;
    }
   
    pushUp(up) {
        this.y = this.y - up;
    }
    pushDown(down) {
        this.y = this.y + down;
    }
}

class message {
    wrapText(context, text, maxWidth, lineHeight, client, currentY, margain) {
        var words = text.split(' ');
        var line = '';
        var lines = new Array();
        var mWidth = 0;
        for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = context.measureText(testLine);
            var testWidth = metrics.width;
            
            if (testWidth > maxWidth && n > 0) {
                
                console.log(line)
                if (client) {
                    if (mWidth < testWidth) {
                        mWidth = testWidth;
                    }
                    lines.push(new textLine(line, (this.w / 2) + ((this.w / 2) - mWidth) - margain, currentY - 10));
                    console.log("Half Width:", (this.w / 2));
                    console.log("length", mWidth);
                    console.log("x:", (this.w / 2) + ((this.w / 2) - mWidth) - margain);
                } else {
                    lines.push(new textLine(line, margain * 2, currentY - 10));
                    console.log("x:", margain * 2);
                }
                line = words[n] + ' ';
                for (var i = 0; i < lines.length; i++) {
                    lines[i].pushUp(lineHeight);
                }
            }
            else {
                line = testLine;
            }
        }
        
        if (client) {

            if (mWidth < testWidth) {
                mWidth = testWidth;
            }
            console.log(line)
            lines.push(new textLine(line, (this.w / 2) + ((this.w / 2) - mWidth) - margain, currentY - 10));
            mWidth = 0;
            for (var i = 0; i < lines.length; i++) {
                if (context.measureText(lines[i].text).width > mWidth) {
                    console.log(lines[i].text, context.measureText(lines[i].text).width);
                    mWidth = context.measureText(lines[i].text).width;
                }
            }
            for (var i = 0; i < lines.length; i++) {
                lines[i].x = (this.w / 2) + ((this.w / 2) - mWidth) - margain;
            }

            console.log("Half Width:", (this.w / 2));
            console.log("length", mWidth);
            console.log("x:", lines[0].x, "should be", (this.w / 2) + ((this.w / 2) - mWidth));
        } else {
            lines.push(new textLine(line, margain*2, currentY-10));
        }
        
        return lines;
    }
    constructor(text, client, canvas, startY, margain, textMargain) {
        this.canvas = canvas;
        this.interval = 0;
        this.h = canvas.getAttribute("height");
        this.w = canvas.getAttribute("width");
        this.ctx = canvas.getContext("2d");
        this.ctx.font = "20px serif"
        this.ctx.lineJoin = "round";
        this.ctx.lineWidth = 3;
        this.startY = startY;
        this.text = text;
        this.lines = this.wrapText(this.ctx, this.text, this.w*(3/4), 25, client, this.startY, margain);
        this.hieght = this.lines.length * 25 + (2 * margain);
        this.client = client;
        this.x = this.lines[0].x;
        this.y = this.lines[0].y;
        this.margain = margain;
        this.text_margain = textMargain;
        this.max_width = 0;
        for (var i = 0; i < this.lines.length; i++) {
            let lw = this.ctx.measureText(this.lines[i].text).width;
            if ( lw > this.max_width) {
                this.max_width = this.ctx.measureText(this.lines[i].text).width
            }
            this.lines[i].pushDown(this.hieght);
        }
    }
    get interval() {
        return this.__interval;
    }
    set interval(interval) {
        this.__interval = interval;
    }
    draw() {

        this.ctx.strokeRect(this.x - this.margain, this.y - textLine.textHieght, this.max_width + this.margain, this.hieght);
        for (var i = 0; i < this.lines.length; i++) {
            this.ctx.fillText(this.lines[i].text, this.lines[i].x, this.lines[i].y, this.w * (3 / 4));
        }
        
            
        
       
    }
    
    move_up(y) {
        for (var i = 0; i < this.lines.length; i++) {
            this.lines[i].pushUp(y);
        }
        this.y = this.lines[0].y;
        this.draw()
    }
    get y() {
        return this.__y;
    }
    set y(y) {
        this.__y = y;
    }
    get hieght() {
        return this.__hieght;
    }
    set hieght(h) {
        this.__hieght = h;
    }
}
function stopLift() {
    window.clearInterval(interval);
}
function raiseLines(msgs, canvas) {
    let last = msgs.length - 1;
    if (msgs[last].y > canvas.getAttribute("height") - msgs[last].hieght) {

        canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
        for (var i = 0; i < msgs.length; i++) {

            msgs[i].move_up(2);
        }
    } else {

        messageDone = true;
        window.clearInterval(msgs[last].interval);
    }
}

class messageBoard{

    constructor(canvasID, margain, textMargain) {
        
        this.canvas = document.getElementById(canvasID);
        this.h = this.canvas.getAttribute("height");
        this.w = this.canvas.getAttribute("width");
        this.ctx = this.canvas.getContext("2d");
        this.margain = margain;
        this.text_margain = textMargain;
        this.messages = new Array()
        this.startY = Number(this.h) + Number(margain);
    }
    
    
    
    newMessage(text, client) {
        messageDone = false;
        var msg = new message(text, client, this.canvas, this.startY, this.margain, this.text_margain);
        this.messages.push(msg);
        msg.interval = window.setInterval(raiseLines, 4, this.messages, this.canvas);
    }
}
var client = false;
var msgBoard;
function setup() {
    msgBoard = new messageBoard("myCanvas", 10, 10);

    document.getElementById("form").addEventListener("submit", driver);
}
function driver(event) {
    event.preventDefault();
    client = !client;
    let text = document.getElementById("msg").value;
    msgBoard.newMessage(text, client)
   
}
addEventListener("load",setup)