// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })

// In cypress/support/commands.js

Cypress.Commands.add('login', (email, password) => {
    cy.session([email, password], () =>
    {
        cy.visit('/login');
        cy.get('input[name=email]').type(email);
        cy.get('input[name=password]').type(password);
        cy.get('form').submit();
    });
});



Cypress.Commands.add('dbreset', () => {
    cy.exec('php artisan migrate:refresh && php artisan db:seed');
});
