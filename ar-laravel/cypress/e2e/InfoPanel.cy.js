describe('InfoPanel', () => {

    beforeEach(() => {
        cy.login('admin@admin.com', 'admin');
        cy.visit('/players/22ff404126a9cb78822a4b7dfa0e5ea26fda9284');
    });
    

    it('InfoPanel loaded well', () => {
        cy.get('#players-info').should('be.visible');
        cy.get('#players-info').within(() => {
            cy.get('input[name="name"]').should('be.visible');
        });
    });

    it('Edit player info and save', () => {
        cy.get('#players-info').within(() => {
            cy.get('input[name="permission"]').clear().type(12);
            cy.get('button[type="submit"]').click();
        });
        
        cy.get('#successMessage').should('be.visible');
        cy.get('input[name="permission"]').should('have.value', '12');
    });

    it('Group validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('input[name="group"]').clear().type('12');

            cy.get('button[type="submit"]').click();
        });
        cy.get('#groupError').should('be.visible');
    });

    it('Permission validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('input[name="permission"]').clear().type('asdasd');

            cy.get('button[type="submit"]').click();
        });
        cy.get('#permissionError').should('be.visible');

        cy.get('#players-info').within(() => {
            cy.get('input[name="permission"]').clear().type('-1');

            cy.get('button[type="submit"]').click();
        });
        cy.get('#permissionError').should('be.visible');
    });

    it('Job grade validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('input[name="job_grade"]').clear().type('asdasd');
            cy.get('button[type="submit"]').click();
        });
        cy.get('#job_gradeError').should('be.visible');

        cy.get('#players-info').within(() => {
            cy.get('input[name="job_grade"]').clear().type('145');
            cy.get('button[type="submit"]').click();
        });
        cy.get('#job_gradeError').should('be.visible');
    });

    it('Phone validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('input[name="phone"]').clear().type('123-asd');

            cy.get('button[type="submit"]').click();
        });
        cy.get('#phoneError').contains('format is invalid').should('be.visible');

        cy.get('#players-info').within(() => {
            cy.get('input[name="phone"]').clear().type('692-6085 ');

            cy.get('button[type="submit"]').click();
        });
        cy.get('#phoneError').contains('already been taken').should('be.visible');
    });

    it('Account JSON validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('input[name="account"]').clear().type('{"bank":12, "money":123,}',{ parseSpecialCharSequences: false });

            cy.get('button[type="submit"]').click();
        });
        cy.get('#accountError').contains('valid JSON string').should('be.visible');


    });

    it('Inventory JSON validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('textarea[name="inventory"]').clear().type('[{"bank":12, "money":123,}]',{ parseSpecialCharSequences: false });
            cy.get('button[type="submit"]').click();
        });
        cy.get('#inventoryError').contains('valid JSON string').should('be.visible');


    });

    it('Skin JSON validation', () => {
        cy.get('#players-info').within(() => {
            cy.get('textarea[name="skin"]').clear().type('[{"bank":12, "money":123,}]',{ parseSpecialCharSequences: false });
            cy.get('button[type="submit"]').click();
        });
        cy.get('#skinError').contains('valid JSON string').should('be.visible');


    });

});