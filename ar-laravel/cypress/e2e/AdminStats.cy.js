describe('Admin Stats', () => {
    beforeEach(() => {
        
        cy.login('admin@admin.com', 'admin');
        cy.visit('/adminstat');


    });

    it('Duty time range picker', () => {
        cy.get('#dateRangePicker').click();
        cy.get('span.arrowDown').click();

        cy.get('.flatpickr-monthDropdown-months').select('December', { force: true });
        cy.contains('.flatpickr-day', '11').click();
        cy.contains('.flatpickr-day', '15').click();
        cy.url().should('include', 'start_date=1702254200');
        cy.url().should('include', 'end_date=1702599800');

        cy.get('#startDate').contains('2023-12-11').should('be.visible');
        cy.get('#endDate').contains('2023-12-15').should('be.visible');
        cy.get('#allDutyTime').contains('14158').should('be.visible');
    });
});