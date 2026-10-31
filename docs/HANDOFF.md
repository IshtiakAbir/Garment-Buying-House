# Handoff Workflow (/handoff)

This workflow ensures project memory remains accurate across developer shifts and agent sessions.

## Execution Steps

1. **Update `docs/PROJECT_STATE.md`**:
   - Update `Current Status`, `Done`, `In Progress`, `Next 3 Steps`, and `Blockers`.
   - Update `Files Recently Changed` to reflect all modified files.
   - Keep total lines <= 100.

2. **Update `docs/TASKS.md`**:
   - Mark completed tasks with `[x]`.
   - Add any newly identified sub-tasks with task IDs.

3. **Update `docs/ARCHITECTURE.md`** (if changed):
   - Record newly added models, routes, controllers, or directory changes.

4. **Update `docs/DECISIONS.md`** (if changed):
   - Record any new architecture or technical decision with date (one line per decision).

5. **Stage & Verify Git Status**:
   - Run `git status`.
   - Ensure NO secrets, API keys, passwords, `.env` files, or binary artifacts are staged.

6. **Commit & Push**:
   - Commit changes: `git commit -m "docs(<task-id>): update project memory and task state"`
   - Push to remote: `git push origin main`
