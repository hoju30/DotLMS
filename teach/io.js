const diveLinker = new DiveLinker("dive");

window.addEventListener('load', function() {
    diveLinker.enableBlock(true);
    saveValueToDatabase();
});


function pause() {
    diveLinker.pause();
    diveLinker.enableBlock(true);
}

function stop() {
    diveLinker.stop();
    diveLinker.start();
}

function resume() {
    diveLinker.enableBlock(false);
    diveLinker.resume();
}

function saveValueToDatabase() {
    const value = diveLinker.getAttr("b6273f3ee70347408937521ee6d6fbe8");
    $.ajax({
        url: 'save_value.php',
        type: 'POST',
        data: { value: value },
        success: function (response) {
            console.log('Value saved successfully:', response);
        },
        error: function (xhr, status, error) {
            console.error('Error saving value:', error);
        }
    });
}

