describe('Admin Dashboard', () => {
    beforeEach(() => {
        cy.dbreset();
        cy.login('admin@admin.com', 'admin');
        cy.visit('/admin');


    });
    it('Dashboard exists and have min 1 element', () => {
        cy.contains('Admin Dashboard');
        cy.get('table').should('exist');
        cy.get('tbody > tr').should('exist');
    });

    it('Create 5 new user from admin dashboard', () => {
        for (let i = 0; i < 5; i++) {
            cy.get('#createButton').click();
            cy.get('#createUserModal').should('be.visible');
            const username = Math.random().toString(36).substring(7);
            const domain = 'example.com';
            const email = username + '@' + domain;
            const randomPass = Cypress._.random(10000000, 99999999).toString();
            const isAdmin = Math.random() >= 0.5;
            cy.get('#createUserModal').within(() => {
                cy.get('input[name="name"]').type(username);
                cy.get('input[name="email"]').type(email);
                cy.get('input[name="password"]').type(randomPass);
                cy.get('input[name="password_confirmation"]').type(randomPass);
                if (isAdmin) {
                    cy.get('input[name="is_admin"]').check();
                }
                cy.get('form').submit();
            });
            cy.get('table').then(($table) => {
                if ($table.text().includes(email)) {
                    if (isAdmin) {
                        cy.contains('tbody tr', email).then(($el) => {
                            const $row = $el.closest('tr');
                            cy.wrap($row).within(() => {
                                cy.get('.bg-green-500').should('exist');
                            });
                        });
                    }

                } else {
                    cy.get('a[rel="next"]').then(($nextButton) => {
                        const previousButton = $nextButton.prev();
                        cy.wrap(previousButton).click();
                        if (isAdmin) {
                            cy.contains('tbody tr', email).then(($el) => {
                                const $row = $el.closest('tr');
                                cy.wrap($row).within(() => {
                                    cy.get('.bg-green-500').should('exist');
                                });
                            });


                        }
                    });
                    
                }
            });
            cy.contains(email).should('exist');
            


        }

    }); 

    it('Create user without values', () => {
        cy.get('#createButton').click();
        cy.get('#createUserModal').should('be.visible');
        cy.get('#createUserModal').within(() => {
            cy.get('form').submit();
            cy.get('.text-red-600').should('be.visible');
            cy.contains('The name field is required.').should('be.visible');
            cy.contains('The email field is required.').should('be.visible');
            cy.contains('The password field is required.').should('be.visible');
        });
    });

    it('Create user with same email', () => {
        cy.get('#createButton').click();
        cy.get('#createUserModal').should('be.visible');
        cy.get('#createUserModal').within(() => {
            cy.get('input[name="name"]').type('Test User');
            cy.get('input[name="email"]').type('admin@admin.com');
            cy.get('input[name="password"]').type('passwordasdasd');
            cy.get('input[name="password_confirmation"]').type('passwordasdasd');
            cy.get('form').submit();
            cy.get('.text-red-600').should('be.visible');
            cy.contains('The email has already been taken.').should('be.visible');
        });
    });

    it('Create user with password less than 8 characters', () => {
        cy.get('#createButton').click();
        cy.get('#createUserModal').should('be.visible');
        cy.get('#createUserModal').within(() => {
            cy.get('input[name="name"]').type('Test User');
            cy.get('input[name="email"]').type('test123@test.com');
            cy.get('input[name="password"]').type('pass');
            cy.get('input[name="password_confirmation"]').type('pass');
            cy.get('form').submit();
            cy.get('.text-red-600').should('be.visible');
            cy.contains('The password field must be at least 8 characters.').should('be.visible');
        });
    });

    it('Create user with password confirmation not matching', () => {
        cy.get('#createButton').click();
        cy.get('#createUserModal').should('be.visible');
        cy.get('#createUserModal').within(() => {
            cy.get('input[name="name"]').type('Test User');
            cy.get('input[name="email"]').type('teste123@test.com');
            cy.get('input[name="password"]').type('passwordasdasd');
            cy.get('input[name="password_confirmation"]').type('passwordasdasd2');
            cy.get('form').submit();
            cy.get('.text-red-600').should('be.visible');
            cy.contains('The password field confirmation does not match.').should('be.visible');
        });
    });


    it('Select user, delete button visible/unvisible', () => {
        cy.get('tbody tr:first').within(() => {
            cy.get('input[type="checkbox"]').check();
        });
        cy.get('#admin_deletebutton').should('be.visible');

        cy.get('tbody tr:first').within(() => {
            cy.get('input[type="checkbox"]').uncheck();
        });
        cy.get('#admin_deletebutton').should('be.not.visible');
        
    });

    it('Delete multiple random users', () => {
        
        cy.get('tbody tr').then(($rows) => {
            if ($rows.length >= 2) {
                const lastTwoRows = $rows.slice(-2);
                lastTwoRows.each((index) => {
                    const $row = Cypress.$(lastTwoRows[index]); 
                    cy.wrap($row).find('input[type="checkbox"]').check(); 
                });
            } else {
                cy.log('There are less than two rows in the tbody');
            }
        });
        cy.get('#admin_deletebutton').click();
        cy.get('tbody tr').should('have.length', 1);
        
    });

    it('Edit user', () => {
        let email, name;
        cy.get('tbody tr:first').within(() => {
            cy.get('.user-email').invoke('text').then((text) => {
                
                email = text;

            });

            cy.get('.user-name').invoke('text').then((text) => {
                
                name = text;

            });
        
            cy.get('a').click();
        });
        
        
        cy.get('#editUserModal').should('be.visible');
        cy.get('#editUserModal').within(() => {
            cy.get('input[name="email"]').should('have.value', email);
            cy.get('input[name="name"]').should('have.value', name);
            cy.get('input[name="name"]').clear().type('testuseredited');
            cy.get('form').submit();
        });
        cy.contains('testuseredited').should('be.visible');

    });

    it('Search exist user and not exist user', () => {
        cy.get('input[name="search"]').type('admin');
        cy.get('tbody tr').contains('admin').should('be.visible');
        cy.get('input[name="search"]').clear().type('notexistuser');
        cy.get('tbody tr').should('not.be.visible');
    });

});