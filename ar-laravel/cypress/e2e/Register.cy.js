describe('Registration', () => {
    beforeEach(() => {
        cy.visit('/register'); 
    });
    
    it('Register a new user 5 times', () => {
        cy.dbreset();    
        for(let i = 0; i<5; i++) {
            const username = Math.random().toString(36).substring(7);
            const domain = 'example.com';
            const email = username + '@' + domain;
            const randomPass = Cypress._.random(10000000, 99999999).toString();

            cy.visit('/register'); 
            cy.get('input[name="name"]').type(username);
            cy.get('input[name="email"]').type(email);
            cy.get('input[name="password"]').type(randomPass);
            cy.get('input[name="password_confirmation"]').type(randomPass);

            
            cy.get('form').submit();

            
            cy.location('pathname').should('equal', '/home');
            cy.get('#profileName').should('be.visible').contains(username);
            cy.clearCookies();
        }
        cy.dbreset();
    });

    it('Register empyt values.', () => {
        

        cy.get('form').submit();
        cy.get('.text-red-600').should('be.visible');
        cy.contains('The name field is required.');
        cy.contains('The email field is required.');
        cy.contains('The password field is required.');

    });

    it('Register same email.', () => {

        cy.get('input[name="name"]').type('Test User');
        cy.get('input[name="email"]').type('admin@admin.com');
        cy.get('input[name="password"]').type('passwordasdasd');
        cy.get('input[name="password_confirmation"]').type('passwordasdasd');
        cy.get('form').submit();
        cy.get('.text-red-600').should('be.visible');
        cy.contains('The email has already been taken.');
    });

    it('Passowrd validations 10 times', () => {
        for(let i = 0; i< 10; i++) {
            const randomPass = Cypress._.random(1000000, 9999999).toString();
            cy.get('input[name="name"]').clear().type('Test User');
            cy.get('input[name="email"]').clear().type('test2@admin.com');
            cy.get('input[name="password"]').type(randomPass);
            cy.get('input[name="password_confirmation"]').type(randomPass);
            cy.get('form').submit();
            cy.get('.text-red-600').should('be.visible');
            cy.contains('The password field must be at least 8 characters.');
        }

        cy.get('input[name="password"]').clear().type('password');
        cy.get('input[name="password_confirmation"]').clear().type('password2');
        cy.get('form').submit();
        cy.get('.text-red-600').should('be.visible');
        cy.contains('The password field confirmation does not match.');
    });
});
