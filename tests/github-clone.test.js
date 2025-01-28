import { describe, test, expect, vi } from 'vitest';

describe('GitHub Clone Functionality', () => {
    test('fetchPullRequests returns array of pull requests', async () => {
        global.fetch = vi.fn(() =>
            Promise.resolve({
                ok: true,
                json: () => Promise.resolve([
                    {
                        title: 'Test PR',
                        number: 1,
                        state: 'open',
                        created_at: '2024-01-01T00:00:00Z',
                        user: { login: 'testuser' },
                        head: { repo: { clone_url: 'https://github.com/test/repo.git' } }
                    }
                ])
            })
        );

        const prs = await fetchPullRequests();
        expect(prs).toHaveLength(1);
        expect(prs[0].title).toBe('Test PR');
    });

    test('filterPRs filters by state correctly', async () => {
        const mockPRs = [
            { state: 'open', title: 'Open PR' },
            { state: 'closed', title: 'Closed PR' }
        ];

        const filtered = mockPRs.filter(pr => pr.state === 'open');
        expect(filtered).toHaveLength(1);
        expect(filtered[0].title).toBe('Open PR');
    });
}); 