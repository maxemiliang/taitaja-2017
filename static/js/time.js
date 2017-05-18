$(document).ready(function() {
    new Cleave('#time1', {
        blocks: [2,2,2],
        delimiters: [',', '.'],
        numericOnly: true
    });
    new Cleave('#time2', {
        blocks: [2,2,3],
        delimiters: [',', '.'],
        numericOnly: true
    });
    new Cleave('#result3', {
        numericOnly: true
    });
    new Cleave('#result4', {
        numericOnly: true
    });
}); 