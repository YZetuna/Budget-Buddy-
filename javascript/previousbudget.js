// Function to fetch and display previous budgets
function fetchPreviousBudgets() {
    fetch('backend.php?action=fetchPreviousBudgets')
        .then(response => response.json())
        .then(data => {
            const previousBudgetsContainer = document.getElementById('previousBudgets');
            if (data.length > 0) {
                data.forEach((budget, index) => {
                    const budgetList = document.createElement('div');
                    budgetList.classList.add('budgetList');
                    budgetList.innerHTML = `
                        <h3>Budget ${index + 1}:</h3>
                        <ul>Income: $${budget.Income}</ul>
                        <ul>Expenses: $${budget.Expenses}</ul>
                        <ul>Total Profit: $${budget.Total}</ul>
                    `;
                    previousBudgetsContainer.appendChild(budgetList);
                });
            } else {
                previousBudgetsContainer.innerHTML = '<p>No previous budgets found.</p>';
            }
        })
        .catch(error => console.error('Error fetching previous budgets:', error));
}

// Function to fetch and display budget comparisons
function fetchBudgetComparisons() {
    fetch('backend.php?action=fetchBudgetComparisons')
        .then(response => response.json())
        .then(data => {
            const budgetComparisonContainer = document.getElementById('budgetComparison');
            const compareBudget1 = document.createElement('div');
            compareBudget1.classList.add('compareBudget1');
            compareBudget1.innerHTML = `
                <h3>Budget 1 Week Ago:</h3>
                <ul>Income: $${data.week1.Income}</ul>
                <ul>Expenses: $${data.week1.Expenses}</ul>
                <ul>Total Profit: $${data.week1.Total}</ul>
            `;
            budgetComparisonContainer.appendChild(compareBudget1);

            const compareBudget2 = document.createElement('div');
            compareBudget2.classList.add('compareBudget2');
            compareBudget2.innerHTML = `
                <h3>Budget 2 Weeks Ago:</h3>
                <ul>Income: $${data.week2.Income}</ul>
                <ul>Expenses: $${data.week2.Expenses}</ul>
                <ul>Total Profit: $${data.week2.Total}</ul>
            `;
            budgetComparisonContainer.appendChild(compareBudget2);
        })
        .catch(error => console.error('Error fetching budget comparisons:', error));
}

// Call functions to fetch and populate data on page load
document.addEventListener('DOMContentLoaded', () => {
    fetchPreviousBudgets();
    fetchBudgetComparisons();
});
