class Parent {

    private children: Child[];
    private requests: Requests[];

    constructor() {
        this.children = [];
        this.requests = [];
    }

    getChildren() {
        return this.children;
    }

    getRequests() {
        return this.requests;
    }

    addChild(child: Child) {
        this.children[this.children.length] = child;
    }

    removeChild(child: Child) {
        for (let i = 0; i < this.children.length; i++) {
            if (this.children[i] === child) {
                this.children.splice(i,1);
            }
        }
    }

    sendFund(child: Child, fund: Fund) {
        child.receiveFund(fund);
    }

    receiveRequest(request: Requests) {
        this.requests[this.requests.length] = request;
    }

    approveRequest(index: number) {
        let request: Requests = this.requests[index];
        request.getChild().receiveFund(request.getFund());
        this.requests.splice(index, 1);
    }

    denyRequest(index: number) {
        this.requests.splice(index,1);
    }
}