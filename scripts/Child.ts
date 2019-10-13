class Child {

    private parent: Parent;
    private funds: Fund[];
    private banned: string[];
    private approved: string[];

    constructor(parent: Parent) {
        this.parent = parent;
        this.funds = [];
        this.banned = [];
        this.approved = [];

        this.parent.addChild(this);
    }

    request(amount: number, stores: string[]) {
        this.parent.receiveRequest(new Requests(this, new Fund(amount, stores)));
    }

    receiveFund(fund: Fund) {
        this.funds[this.funds.length] = fund;
        this.updateTables();
    }

    getParent() {
        return this.parent;
    }

    getFunds() {
        return this.funds;
    }

    getBanned() {
      return this.banned;
    }

    getApproved() {
      return this.approved;
    }

    getTotalAmount() {
        let total: number = 0;
        for (let i = 0; i < this.funds.length; i++) {
            total += this.funds[i].getAmount();
        }
        return total;
    }

    getAllExpenses() {
        let all: Expense[] = [];
        for (let i = 0; i < this.funds.length; i++) {
            all.concat(this.funds[i].getExpenses());
        }
        return all;
    }

    addBanned(store: string) {
        this.removeApproved(store);
        this.removeBanned(store);
        this.banned[this.banned.length] = store;
        this.updateTables();
    }

    addApproved(store: string) {
        this.removeApproved(store);
        this.removeBanned(store);
        this.approved[this.approved.length] = store;
        this.updateTables();
    }

    removeBanned(store: string) {
        for (let i = 0; i < this.banned.length; i++) {
            if (this.banned[i] === store) {
                this.banned.splice(i,1);
            }
        }
        this.updateTables();
    }

    removeApproved(store: string) {
        for (let i = 0; i < this.approved.length; i++) {
            if (this.approved[i] === store) {
                this.approved.splice(i,1);
            }
        }
        this.updateTables();
    }

    pay(expense: Expense) {
        let best_Fund: Fund[] = [];
        
        for (let i = 0; i < this.funds.length; i++) {
            if (this.acceptableFund(this.funds[i], expense)) {
                if (best_Fund.length === 0) {
                    best_Fund[0] = this.funds[i];
                }
                else if (this.funds[i].getStores().length < best_Fund[0].getStores().length) {
                    best_Fund[0] = this.funds[i];
                }
                else if (this.funds[i].getStores().length === best_Fund[0].getStores().length && this.funds[i].getAmount() >= best_Fund[0].getAmount()){
                    best_Fund[0] = this.funds[i];
                }
            }
        }

        if (best_Fund.length === 0) {
            return false;
        }

        best_Fund[0].addExpense(expense);
        this.updateTables();
        return true;
    }

    acceptableFund(fund: Fund, expense: Expense) {
        if (fund.getStores().length === 0) {
            return fund.getAmount() >= expense.getAmount() && this.banned.indexOf(expense.getStore()) === -1;
        }
        return fund.getAmount() >= expense.getAmount() && fund.getStores().indexOf(expense.getStore()) >= 0;
    }

    updateTables() {

    }
}