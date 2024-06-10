"use strict"
var resultsbtn = document.getElementById("btnResults")

function calcResults() {
    // calculate gross income
    var week1income = Number(document.getElementById("week1Income").value)
    var week2income = Number(document.getElementById("week2Income").value)
    var week3income = Number(document.getElementById("week3Income").value)
    var week4income = Number(document.getElementById("week4Income").value)
    var income = week1income + week2income + week3income + week4income
    // display gross income
    var incomeString = income.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
    })
    document.getElementById("grossIncome").innerHTML = incomeString

    //calculate gross expenses
    var gasExpenses = Number(document.getElementById("gasExpenses").value)
    var insurance = Number(document.getElementById("insurance").value)
    var workersComp = Number(document.getElementById("workersComp").value)
    var parking = Number(document.getElementById("parking").value)
    var mechanic = Number(document.getElementById("mechanic").value)
    var expenses = gasExpenses + insurance + workersComp + parking + mechanic
    // display gross expenses
    var expensesString = expenses.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
    })
    document.getElementById("grossExpenses").innerHTML = expensesString

    // calculate net total
    var total = income - expenses
    // display net total
    var totalString = total.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
    })
    document.getElementById("netTotal").innerHTML = totalString

    // estimate next week's profit
    var estimatedProfit = total / 4
    var estimatedProfitString = estimatedProfit.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD'
    })
    // display next week's estimated profit
    document.getElementById("estimatedProfit").innerHTML = estimatedProfitString
}