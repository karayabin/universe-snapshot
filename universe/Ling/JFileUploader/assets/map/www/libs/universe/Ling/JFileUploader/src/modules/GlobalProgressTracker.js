export default class GlobalProgressTracker {

    constructor() {
        this.nbItems = 0;
        this.totalWeight = 0;
        this.slots = {};
    }

    registerItems(uFiles) {

        this.nbItems = 0;
        this.totalWeight = 0;
        this.slots = {};

        for (let uFile of uFiles) {
            if (2 === uFile.status) {
                this.slots[uFile.id] = 0;
                this.totalWeight += uFile.size;
                this.nbItems++;
            }
        }
    }

    addProgress(id, percent) {
        var maxPercentPerSlot = Math.round(100 / this.nbItems, 2);
        this.slots[id] = percent * maxPercentPerSlot / 100;
    }

    getPercent() {
        var percent = 0;
        for (var id in this.slots) {
            percent += this.slots[id];
        }
        return percent;
    }

    getTotalWeight() {
        return this.totalWeight;
    }

}

