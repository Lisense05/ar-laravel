describe('All Players', () => {
    beforeEach(() => {

        cy.login('admin@admin.com', 'admin');
        cy.visit('/players');


    });

    it('Table loaded well with paginate', () => {
        cy.get('#players-table').should('be.visible');
        cy.get('nav[aria-label="Pagination Navigation"]').should('be.visible');
    });

    it('Paginate test', () => {
        cy.get('nav[aria-label="Pagination Navigation"]').contains('2').click();
        cy.get('#players-table').should('be.visible');
        cy.url().should('include', 'page=2');
        cy.get('nav[aria-label="Pagination Navigation"]')
            .find('a[rel="next"]')
            .click();
        cy.get('#players-table').should('be.visible');
        cy.url().should('include', 'page=3');

    });

    it('Edit user after click random row', () => {
        let fidentifier;
        cy.get('#players-tableBody > tr').then(rows => {
            const randomIndex = Math.floor(Math.random() * rows.length);
            cy.log(rows.length);
            const randomRow = rows[randomIndex];

            cy.wrap(randomRow).find('.player-identifier').invoke('text').then(identifier => {
                fidentifier = identifier.trim();

            });


            cy.wrap(randomRow).scrollIntoView().then($row => {
                cy.wrap($row).click({ force: true });
                cy.get('#moreInfoHeader h3').should('be.visible');
                cy.get('#name')
                    .invoke('val')
                    .then(actualValue => {
                        const trimmedActualValue = actualValue.trim();
                        expect(trimmedActualValue).to.equal(fidentifier);
                    });

            });

        });



    });

    
});