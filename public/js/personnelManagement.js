function transferToAnotherObject() {

    axios.post('/transferEmployeeToAnotherObject', {
        idEmployee: document.getElementById('idPerson').innerText,
        newObject : document.getElementById('object').value,
    }).then(res => {
        if (res.status === 200) {
            console.log(res.data);
            window.location.replace(/analytics/+document.getElementById('companyName').innerText);
        }
    }).catch(error => {
        console.log("Error!!!");
    });
}

function transferToAnotherCompany() {

    axios.post('/transferEmployeeToAnotherCompany', {
        idEmployee: document.getElementById('idPerson').innerText,
        newCompany : document.getElementById('company').value,
    }).then(res => {
        if (res.status === 200) {
            console.log(res.data);
            window.location.replace(/analytics/+document.getElementById('companyName').innerText);
        }
    }).catch(error => {
        console.log("Error!!!");
    });
}

function deleteEmployee() {

    axios.post('/deleteEmployee', {
        idEmployee: document.getElementById('idPerson').innerText,
    }).then(res => {
        if (res.status === 200) {
            console.log(res.data);
            window.location.replace(/analytics/+document.getElementById('companyName').innerText);
        }
    }).catch(error => {
        console.log("Error!!!");
    });
}
