const brailleMap = {
    'a': '⠁', 'b': '⠃', 'c': '⠉', 'd': '⠙', 'e': '⠑', 'f': '⠋', 'g': '⠛', 'h': '⠓', 'i': '⠊', 'j': '⠚',
    'k': '⠅', 'l': '⠇', 'm': '⠍', 'n': '⠝', 'o': '⠕', 'p': '⠏', 'q': '⠟', 'r': '⠗', 's': '⠎', 't': '⠞',
    'u': '⠥', 'v': '⠧', 'w': '⠺', 'x': '⠭', 'y': '⠽', 'z': '⠵', ' ': '⠀', '?': '⣿'
};

function translateToBraille() {
    const text = document.getElementById('textInput').value.toLowerCase();
    let brailleText = '';
    for (let char of text) {
        if (brailleMap[char]) {
            brailleText += brailleMap[char];
        } else {
            brailleText += char;
        }
    }
    document.getElementById('result').textContent = brailleText;
}