const itemCount = document.querySelector(".item-count");
const itemSub = document.querySelector(".item-sub");
const itemAdd = document.querySelector(".item-add");
const itemCountVal = +itemCount.value;
itemSub.addEventListener("click", function () {
    const itemCountVal = +itemCount.value;
    if (itemCountVal === 1) {
        itemCount.value = 1;
    } else {
        itemCount.value = itemCountVal - 1;
    }
});

itemAdd.addEventListener("click", function () {
    const itemCountVal = +itemCount.value;
    itemCount.value = itemCountVal + 1;
});


