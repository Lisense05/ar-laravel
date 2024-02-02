describe('Authenticate', () => {
  it('Auth for good login data', () => {
      cy.visit('/login')
      cy.get('input[name=email]').type('testuser@gmail.com')
      cy.get('input[name=password]').type('testuser')
      cy.get('button[type=submit]').eq(1).click()
      cy.location('pathname').should('equal', '/home');
      
  })
})
describe('Home permission', () => {

  it('Home page without permission', () => {
    cy.visit('/home');

    cy.location('pathname').should('equal', '/login');
  })
})

describe('Bad login', () => {
  it('Auth for bad login data', () => {
      cy.visit('/login')
      cy.get('input[name=email]').type('testuser@gmail.com')
      cy.get('input[name=password]').type('asd')
      cy.get('button[type=submit]').eq(1).click()
      cy.contains('These credentials do not match our records.');

  })
})

describe('Logout', () => {
    it('Logout', () => {
      cy.visit('/login')
      cy.get('input[name=email]').type('testuser@gmail.com')
      cy.get('input[name=password]').type('testuser')
      cy.get('button[type=submit]').eq(1).click()
      cy.get('button[id=profileButton').click()
      cy.get('a[id=logout').click()
      cy.location('pathname').should('equal', '/');
      
  })
});

describe('Admin permssion', () => {
  it('Admin permission as user', () => {
    cy.visit('/login')
    cy.get('input[name=email]').type('testuser@gmail.com')
    cy.get('input[name=password]').type('testuser')
    cy.get('button[type=submit]').eq(1).click()
    cy.request({
      url: '/admin',
      failOnStatusCode: false,
    }).then((response) => {
      expect(response.status).to.eq(403);
    });
  })
});
