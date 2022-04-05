function expandform() {
    let check = document.getElementById('hidden');
    if (check.className === 'expandform') {
        check.className = '';
    }
    else {
        check.className = 'expandform';
    }
}
