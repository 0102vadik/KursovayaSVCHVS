/*
* При загрузке страницы происходит загрузка графика с данными о потребности в персонале
*/
document.addEventListener('DOMContentLoaded', () => {

    /*
    * График с данными о персонале
    */

    axios.post('/getNeedForStaffYear',{
        companyName: document.querySelector('h1').textContent,
    }).then(res=> {
        if (res.status === 200) {
            new Chart(
                document.querySelector('.chartNeedEmployee'),
                {
                    type: 'line', // линейный тип диаграммы
                    data: {
                        labels: res.data.map(item => item.date),
                        datasets: [
                            {
                                label: 'Потребность в персонале',
                                data: res.data.map(item => item.colNeedForStaff),
                                borderColor: 'green',
                                borderWidth: 1,
                                backgroundColor: 'green',
                                cubicInterpolationMode: 'monotone'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true // назначили оси Y начинать отсчет с нуля
                            }
                        },
                        title: {
                            display: true,
                            text: 'График потребности в персонале'
                        }
                    }
                }
            );
        }
    }).catch(error => {
        console.log("Error!!!");
    });
    /*
    axios.post('/getImplementationOfTheTrainingPlan',{
        companyName: document.querySelector('h1').textContent,
    }).then(res=> {
        if(res.status === 200){
            new Chart(
                document.querySelector('.chartImplementationOfTheTrainingPlan'),
                {
                    type: 'doughnut',
                    data: {
                        labels: ['Не по специальности','По специальности'],
                        datasets: [
                            {
                                label: 'Потребность в персонале',
                                data: [res.data,100-res.data],
                                borderColor: ['#0082e6','#d9d6d6'],
                                borderWidth: 1,
                                backgroundColor: ['#0082e6','#d9d6d6'],
                                cubicInterpolationMode: 'monotone'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    },
                }
            );
        }
    }).catch(error => {
        console.log("Error!!!");
    })*/
})

