class node{

    constructor(data){
        this.next = null;
        this.hasNext = false;
    }
    get data(){
        return this.data;
    }
    get next() {
        return this.next;
    }
    get hasNext() {
        return this.hasNext;
    }
    set next(node) {
        this.hasNext = true;
        this.next = node;
    }
}
class linkedList{
    constuctor(){
        this.head = null;
        this.tail = null;
    }

    forEach(inputFunction) {
        if (this.head != null) {
            var current = this.head;
            inputFunction(current);
            while (this.current.hasNext) {
                current = current.next;
                inputFunction(current);
            }
        }
        
    }
    push(data) {
        if (this.head == null) {
            this.head = new node(null, data)
            this.tail = this.head
        } else {
            this.tail.next = new node(this.tail, data);
            this.tail.
            this.tail = this.tail.next;
        }
    }
    enque(node) {
        if (this.head == null) {
            this.head = node;
            this.tail = node;
        } else {
            this.tail.next = node;
            this.tail = this.tail.next;
        }
    }
    peek() {
        return (this.head);
    }
    pop() {
        temp = this.head;
        this.head = this.head.next;
        return(temp);
    }

}