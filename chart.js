const ctx1 = document.getElementById('dchart1').getContext('2d');
const dchart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            //label: 'Teachers',
            data: [180, 120],
            backgroundColor: [
                'rgb(68, 210, 111)',
                'rgb(203, 156, 102)'
            ]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx2 = document.getElementById('dchart2').getContext('2d');
const dchart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            //label: 'Students',
            data: [150, 150],
            backgroundColor: [
                '#198754',
                '#0d6efd'
            ]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx3 = document.getElementById('dchart3').getContext('2d');
const dchart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            //label: 'Academic Officers',
            data: [160, 140],
            backgroundColor: [
                'gold',
                '#0dcaf0'
            ]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx4 = document.getElementById('bchart4').getContext('2d');
const bchart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Fees Collections',
            data: [73000, 30000, 73000, 37000, 30000, 10000, 67000, 20000, 50000, 60000, 65000, 70000],
            backgroundColor: [
                'rgb(68, 210, 111)',
                '#0d6efd',
                'gold',
                '#0dcaf0',
                'silver',
                'rgb(150, 150, 150)',
                'rgb(203, 156, 102)',
                'rgb(154, 70, 223)',
                'yellow',
                '#198754',
                'rgb(153, 211, 71)',
                '#2ae6ad'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx5 = document.getElementById('bchart5').getContext('2d');
const bchart5 = new Chart(ctx5, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Other Collections',
            data: [73000, 25000, 50000, 34000, 20000, 20000, 60000, 15000, 40000, 50000, 70000, 70000],
            backgroundColor: [
                'rgb(68, 210, 111)',
                '#0d6efd',
                'gold',
                '#0dcaf0',
                'silver',
                'rgb(150, 150, 150)',
                'rgb(203, 156, 102)',
                'rgb(154, 70, 223)',
                'yellow',
                '#198754',
                'rgb(153, 211, 71)',
                '#2ae6ad'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});