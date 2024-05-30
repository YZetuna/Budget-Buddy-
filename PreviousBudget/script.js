document.addEventListener('DOMContentLoaded', () => {
    fetch('/api/budgets')
      .then(response => response.json())
      .then(data => {
        const tableBody = document.querySelector('#budget-table tbody');
        data.forEach(budget => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${budget.date}</td>
            <td>${budget.total}</td>
            <td>${budget.details}</td>
          `;
          tableBody.appendChild(row);
        });
      })
      .catch(error => console.error('Error fetching budgets:', error));
  });
  